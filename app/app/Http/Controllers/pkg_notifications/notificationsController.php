<?php

namespace App\Http\Controllers\pkg_notifications;

use App\Exceptions\pkg_notifications\notificationException;
use App\Exports\pkg_notifications\notificationExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\pkg_notifications\notificationRequest;
use App\Imports\pkg_notifications\notificationImport;
use App\Models\pkg_notifications\notification as pkg_notificationsnotification;
use App\Repositories\pkg_notifications\notificationRepository;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class notificationController extends Controller
{

    protected $notification;
    public function __construct(notificationRepository $notification)
    {

        $this->notification = $notification;
    }

    public function index(Request $request)
    { 
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $searchQuery = str_replace(' ', '%', $searchValue);
                $notificationsData = $this->notification->searchData($searchQuery);
                return view('pkg_notifications.notification.index', compact('notificationsData'))->render();
            }
        }
        $notificationsData = $this->notification->paginate();
        return view('pkg_notifications.notification.index', compact('notificationsData'));
    }

    public function create()
    {
        return view('pkg_notifications.notification.create');
    }

    public function store(notificationRequest $request)
    {
        try {
            $data = $request->validated();
            $this->notification->create($data);
            return redirect()->route('notification.index')->with('success', __('pkg_notifications/notification.singular') . ' ' . __('app.addSucées'));
        } catch (notificationException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function show($id)
    {
        $fetchedData = $this->notification->find($id);
        return view('pkg_notifications.notification.show', compact('fetchedData'));
    }
    public function edit($id)
    {
        $dataToEdit = $this->notification->find($id);
        return view('pkg_notifications.notification.edit', compact('dataToEdit'));
    }

    public function update(notificationRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $this->notification->update($id, $data);
            return redirect()->route('notification.index')->with('success', __('pkg_notifications/notification.singular') . ' ' . __('app.updateSucées'));
        } catch (notificationException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id){
        $this->notification->destroy($id);
        return redirect()->route('notification.index')->with('success', __('pkg_notifications/notification.singular') . ' ' . __('app.deleteSucées'));
    }

    public function export()
    {
        $notifications = $this->notification->all();

        return Excel::download(new notificationExport($notifications), 'notification.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new notificationImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('notification.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('notification.index')->with('success', __('pkg_notifications/notification.singular') . ' ' . __('app.addSucées'));
    }
}
