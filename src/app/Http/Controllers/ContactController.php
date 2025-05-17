<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function contact()
    {
        $contacts = Contact::with('category')->get();
        $categories = Category::all();

        return view('contact', compact('contacts', 'categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $last_name = $request->input('last_name');
        $first_name = $request->input('first_name');
        $full_name = $last_name . ' ' . $first_name;

        $tel1 = $request->input('tel1');
        $tel2 = $request->input('tel2');
        $tel3 = $request->input('tel3');
        $tel = $tel1 . $tel2 . $tel3;

        $category = Category::find($request->input('category_id'));

        $contact = $request->only(['last_name', 'first_name', 'full_name', 'gender', 'email', 'tel', 'address', 'building','detail']);
        $contact['full_name'] = $full_name;
        $contact['tel'] = $tel;
        $contact['category_id'] = $request->input('category_id');
        $contact['category_name'] = $category ? $category->content : '不明';

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'full_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);

        Contact::create($contact);

        return redirect('thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }

    public function admin(Request $request)
    {
        $query = Contact::with('category');

        if ($request->filled('name')) {
            $query->where('full_name', 'LIKE', '%' . $request->input('name') . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->input('email') . '%');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        $contacts = $query->paginate(7)->withQueryString(); // 検索状態を維持

        $categories = Category::all();

        return view('auth.admin', compact('contacts', 'categories'));
    }

    // CSVエクスポート
    public function export(Request $request)
    {
        $query = Contact::with('category');

        if ($request->filled('name')) {
            $query->where('full_name', 'LIKE', '%' . $request->input('name') . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', '%' . $request->input('email') . '%');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        $contacts = $query->get();

        $filename = 'contacts_export_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($contacts) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['名前', 'メール', '性別', 'カテゴリ', '日付']);

            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->full_name,
                    $contact->email,
                    $contact->gender,
                    optional($contact->category)->content,
                    $contact->created_at->format('Y-m-d'),
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
