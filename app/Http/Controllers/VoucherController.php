<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\VoucherRepository;
use Illuminate\Http\Request;
use Flash;

class VoucherController extends AppBaseController
{
    /** @var VoucherRepository $voucherRepository*/
    private $voucherRepository;

    public function __construct(VoucherRepository $voucherRepo)
    {
        $this->voucherRepository = $voucherRepo;
    }

    /**
     * Display a listing of the Voucher.
     */
    public function index(Request $request)
    {
        $vouchers = $this->voucherRepository->paginate(10);

        return view('vouchers.index')
            ->with('vouchers', $vouchers);
    }

    /**
     * Show the form for creating a new Voucher.
     */
    public function create()
    {
        return view('vouchers.create');
    }

    /**
     * Store a newly created Voucher in storage.
     */
    public function store(CreateVoucherRequest $request)
    {
        $input = $request->all();

        $voucher = $this->voucherRepository->create($input);

        Flash::success('Voucher saved successfully.');

        return redirect(route('vouchers.index'));
    }

    /**
     * Display the specified Voucher.
     */
    public function show($id)
    {
        $voucher = $this->voucherRepository->find($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('vouchers.index'));
        }

        return view('vouchers.show')->with('voucher', $voucher);
    }

    /**
     * Show the form for editing the specified Voucher.
     */
    public function edit($id)
    {
        $voucher = $this->voucherRepository->find($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('vouchers.index'));
        }

        return view('vouchers.edit')->with('voucher', $voucher);
    }

    /**
     * Update the specified Voucher in storage.
     */
    public function update($id, UpdateVoucherRequest $request)
    {
        $voucher = $this->voucherRepository->find($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('vouchers.index'));
        }

        $voucher = $this->voucherRepository->update($request->all(), $id);

        Flash::success('Voucher updated successfully.');

        return redirect(route('vouchers.index'));
    }

    /**
     * Remove the specified Voucher from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $voucher = $this->voucherRepository->find($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('vouchers.index'));
        }

        $this->voucherRepository->delete($id);

        Flash::success('Voucher deleted successfully.');

        return redirect(route('vouchers.index'));
    }
}
