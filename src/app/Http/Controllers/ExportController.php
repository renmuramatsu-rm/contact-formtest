<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function csvexport()
    {
        $searchResults = session('search_results', []);

        $contacts = Contact::whereIn('id', $searchResults)->get();

        $csvHeader = [
            '姓',
            '名',
            '性別',
            'メールアドレス',
            '電話番号',
            '住所',
            '建物名',
            'お問い合わせの種類',
            'お問い合わせの内容'
        ];

        $response = new StreamedResponse(
            function () use ($csvHeader, $contacts) {
                $handle = fopen('php://output', 'w');

                fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));


                fputcsv($handle, $csvHeader);

                foreach ($contacts as $contact) {
                    fputcsv($handle, [
                        $contact->last_name,
                        $contact->first_name,
                        $this->convertGender($contact->gender),
                        $contact->email,
                        $contact->phone,
                        $contact->address,
                        $contact->building,
                        $contact->category->content ?? '',
                        $contact->message,
                    ]);
                }

                fclose($handle);
            },
            200,
            [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="users.csv"',
            ]
        );
        return $response;
    }

    private function convertGender($gender)
    {
        switch ($gender) {
            case 1:
                return '男性';
            case 2:
                return '女性';
            case 3:
                return 'その他';
        };
    }
}
