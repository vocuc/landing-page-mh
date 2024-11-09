<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateContactFormRequest;
use App\Http\Requests\UpdateContactFormRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ContactFormRepository;
use Illuminate\Http\Request;
use Flash;

class ContactFormController extends AppBaseController
{
    /** @var ContactFormRepository $contactFormRepository*/
    private $contactFormRepository;

    public function __construct(ContactFormRepository $contactFormRepo)
    {
        $this->contactFormRepository = $contactFormRepo;
    }

    /**
     * Display a listing of the ContactForm.
     */
    public function index(Request $request)
    {
        $contactForms = $this->contactFormRepository->paginate(10);

        return view('contact_forms.index')
            ->with('contactForms', $contactForms);
    }

    /**
     * Show the form for creating a new ContactForm.
     */
    public function create()
    {
        return view('contact_forms.create');
    }

    /**
     * Store a newly created ContactForm in storage.
     */
    public function store(CreateContactFormRequest $request)
    {
        $input = $request->all();

        $contactForm = $this->contactFormRepository->create($input);

        Flash::success('Contact Form saved successfully.');

        return redirect(route('contact-forms.index'));
    }

    /**
     * Display the specified ContactForm.
     */
    public function show($id)
    {
        $contactForm = $this->contactFormRepository->find($id);

        if (empty($contactForm)) {
            Flash::error('Contact Form not found');

            return redirect(route('contact-forms.index'));
        }

        return view('contact_forms.show')->with('contactForm', $contactForm);
    }

    /**
     * Show the form for editing the specified ContactForm.
     */
    public function edit($id)
    {
        $contactForm = $this->contactFormRepository->find($id);

        if (empty($contactForm)) {
            Flash::error('Contact Form not found');

            return redirect(route('contact-forms.index'));
        }

        return view('contact_forms.edit')->with('contactForm', $contactForm);
    }

    /**
     * Update the specified ContactForm in storage.
     */
    public function update($id, UpdateContactFormRequest $request)
    {
        $contactForm = $this->contactFormRepository->find($id);

        if (empty($contactForm)) {
            Flash::error('Contact Form not found');

            return redirect(route('contact-forms.index'));
        }

        $contactForm = $this->contactFormRepository->update($request->all(), $id);

        Flash::success('Contact Form updated successfully.');

        return redirect(route('contact-forms.index'));
    }

    /**
     * Remove the specified ContactForm from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contactForm = $this->contactFormRepository->find($id);

        if (empty($contactForm)) {
            Flash::error('Contact Form not found');

            return redirect(route('contact-forms.index'));
        }

        $this->contactFormRepository->delete($id);

        Flash::success('Contact Form deleted successfully.');

        return redirect(route('contact-forms.index'));
    }
}
