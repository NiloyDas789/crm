<?php

namespace App\Http\Controllers\Dashboard;

use App\Mail\ProductPaymentMail;
use App\Models\Dashboard\PaymentSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use App\Models\Dashboard\Note;
use App\Models\Dashboard\Task;
use App\Models\Dashboard\Branch;
use App\Models\Dashboard\Client;
use App\Models\Dashboard\Office;
use App\Models\Dashboard\Country;
use App\Models\Dashboard\Partner;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\Document;
use App\Models\Dashboard\Workflow;
use App\Http\Controllers\Controller;
use App\Models\Dashboard\Application;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{



    public function downloadD($document)
    {
        $dd = Document::find($document);
        $myFile = 'storage/'.$dd->url;
        return response()->download($myFile);
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index($id)
    {
        $this->checkPermission('application.access');
        $client         = Client::findOrFail($id)->with('applications', 'applications.product', 'city.state.country')->first();
        //        dd($client->first_name);
        $workflows    = Workflow::pluck('name', 'id');
        $partners     = Partner::pluck('name', 'id');
        $offices     = Office::pluck('name', 'id');
        $products     = Product::pluck('name', 'id');
        //        $this->putSL($client->applications);
        return view('dashboard.application.index', compact('client', 'workflows', 'partners', 'offices', 'products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $this->checkPermission('application.create');
        return view('dashboard.application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->checkPermission('application.store');
        $validated = $request->validate([
            'client_id'             => ['integer', 'required'],
            'workflow_id'           => ['integer', 'nullable'],
            'partner_id'            => ['integer', 'nullable'],
            'office_id'             => ['integer', 'nullable'],
            'product_id'             => ['integer', 'required'],
            'started_at'            => ['date', 'nullable'],
            'ended_at'              => ['date', 'nullable'],
            'applied_intake'        => ['date', 'nullable'],
            'note_title'            => ['string', 'nullable'],
            'note_description'      => ['string', 'nullable'],
            'assignee_id'           => ['integer', 'nullable'],
            'application_form_id'   => ['integer', 'nullable'],
        ]);

        $validated['assignee_id'] = auth()->user()->id;
        $validated['image'] = uploadFile($request->file('image'), 'application/image');

        Application::create($validated);

        return redirect()->back()->with('success', 'Application Created Successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param Application $application
     * @return void
     */
    //    public function show(Client $client)
    //    {
    //        $this->checkPermission('application.index');
    //        return view('dashboard.application.show', compact('client'));
    //    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Application $application
     * @return View
     */
    public function edit(Application $application)
    {
        $this->checkPermission('application.edit');
        $client         = Client::findOrFail($application->client->id)->with('applications', 'applications.product', 'city.state.country')->first();
        $tasks          = Task::query()->get();
        $paymentSchedules        = PaymentSchedule::query()->where('application_id', $application->id)->get();
        $documents = Document::get();
        $notes = Note::get();
        return view('dashboard.application.edit', compact('application', 'client', 'tasks', 'documents', 'notes','paymentSchedules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Application $application
     * @return View
     */
    public function update(Request $request, Application $application)
    {
        $this->checkPermission('application.update');
        //         dd($request->all());

        if ($request->has('url')) {
            Document::create([
                'url' =>  uploadFile($request->file('url'), 'application/document'),
                'application_id' => $request->application_id,
                'task_id' => $request->task_id,
            ]);
        }
        if ($request->has('note')) {
            Note::create([
                'note' => $request->note,
                'application_id' => $request->application_id,
                'task_id' => $request->task_id,
            ]);
        }
        $validated = $request->validate([
            'client_id'             => ['integer', 'required'],
            'workflow_id'           => ['integer', 'nullable'],
            'partner_id'            => ['integer', 'nullable'],
            'office_id'             => ['integer', 'nullable'],
            'product_id'             => ['integer', 'required'],
            'started_at'            => ['date', 'nullable'],
            'ended_at'              => ['date', 'nullable'],
            'applied_intake'        => ['date', 'nullable'],
            'note_title'            => ['string', 'nullable'],
            'note_description'      => ['string', 'nullable'],
            'assignee_id'           => ['integer', 'nullable'],
            'application_form_id'   => ['integer', 'nullable'],
        ]);

        $validated['image'] = uploadFile($request->file('image'), 'application/image');

        if ($request->is_active == null) {
            $validated['is_active'] = '0';
        }
        if (!empty($validated)) {
            $application->update($validated);
        }


        return redirect()->back()->with('success', 'Application updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Application $application
     * @return View
     */
    public function destroy(Application $application)
    {
        $this->checkPermission('application.destroy');
        $application->delete();
        return back()->with('delete', 'Application deleted successfully.');
    }

    public function status(Application $application): \Illuminate\Http\RedirectResponse
    {
        if ($application->is_active == 0) {
            $application->is_active = '1';
        } else {
            $application->is_active = '0';
        }

        $application->update();

        return redirect()->route('application.index')->with('success', 'Application updated successfully.');
    }

    public function search(Request $request)
    {
        $applications = Application::query()
            ->where('name', 'like', '%' . $request->get('q') . '%')
            ->paginate(10);

        return view('application.applicationTable', compact('applications'));
    }


    public function checkApplicationTask($task,  $appID)
    {
        $taskData = Task::find($task);
        $application = Application::find($appID);
        $exists = DB::table('applications_tasks');
        $exists->where('application_id', $application->id)
            ->where('task_id', $task);


        $check = $exists->exists();

        if($check){
            $exists->delete();
            return 'done';
        }else{

            $data = [
                'name' => $application->client->first_name.' '.$application->client->last_name,
                'subject' => 'Payment For Product',
                'body' => 'This is a reminder that your payment for product and your product price would be'.$application->product->price ,
                'amount' => $application->product->price,
            ];

            if ($taskData->title == 'Offer Letter'){
                Mail::to($application->client->email)->send(new ProductPaymentMail($data));
            }


            $exists->insert(
                ['application_id' => $application->id, 'task_id' => $task]
            );
            return 'done';
        }
    }

    public function paymentScheduleStore(Request $request)
    {

        $application = Application::find($request->application_id);

        PaymentSchedule::create([
            'client_id' => $application->client_id,
            'application_id' => $application->id,
            'installment_name' => $request->installment_name,
            'installment_date' => $request->installment_date,
            'amount' => $request->amount,
        ]);

        $data = [
            'name' => $application->client->first_name.' '.$application->client->last_name,
            'subject' => 'Payment For Product',
            'body' => 'This is a reminder for Installment. The date of installment is '.$request->installment_date. 'and the amount of installment'.$request->amount,
            'amount' => $application->product->price,
        ];

        Mail::to($application->client->email)->send(new ProductPaymentMail($data));


        return back()->with('status', 'Your Payment Schedule Set Done');



    }


}
