<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\Firm;
use App\Validations\PageValidation;

class AdminFirmController
{
    // Show admin/firm
    public function index()
    {
        $firm = ((new Firm)->allFirm('firm'));

        return view(
            'admin/firm/index',
            [
                'firm' => $firm,
                'firms' => ((new Firm)->firms())
            ]
        );
    }

    // Add admin/firm form
    public function create()
    {
        return view('admin/firm/create');
    }

    // Show single admin/firm
    public function show()
    {
        $firm = ((new Firm)->showFirm(Request::values()['id']));

        return view('admin/firm/show', ['firm' => $firm]);
    }

    // Store admin/firm
    public function store()
    {
        // Validate admin/firm
        $data = (new PageValidation)
            ->validatePage(Request::values());

        // Send to store
        (new Firm)->storeFirm('firm', $data);

        // Success message
        echo json_encode([
            'success'   => true,
            'message'   => 'Фирма добавлена успешно!'
        ]);
    }

    // Edit admin/firm
    public function edit()
    {
        $firm = (new Firm)->getFirm(
            Request::values()['id']
        );

        return view('admin/firm/edit', ['firm' => $firm]);
    }

    // Update admin/firm
    public function update()
    {
        // Validate admin/firm
        $data = (new PageValidation)
            ->validatePage(Request::values());
        // Push id
        $data['id'] = Request::values()['id'];

        (new Firm)->updateFirm($data);

        // Success message
        echo json_encode([
            'success' => true,
            'message' => 'Фирма обновлена успешно!'
        ]);
    }

    // Delete admin/firm
    public function destroy()
    {
        (new Firm)->firmDestroy(Request::values()['id']);

        redirect('admin/author');
    }
}