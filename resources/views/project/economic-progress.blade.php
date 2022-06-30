@extends('layouts.app')

@section('content')
<div class="container">
    @include('project.navigation')
    <div class="my-3">
        @include('alerts.all')
    </div>
    <div class="box">
        <div class="box__body">
            <div class="d-flex mb-3 align-items-center">
                <div class="box__title">Payments</div>
                <button type="button" class="btn btn-primary z-depth-0 ml-auto" data-toggle="modal" data-target="#newPaymentModal">
                    Add Payment
                </button>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Remarks</th>
                </tr>
                @foreach ($economicProgresses as $payment)
                <tr>
                    <td>{{ $payment->date }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->remarks }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<div id="newPaymentModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header box__title">
                Record New Payment
            </div>
            <div class="modal-body">
                <payment-form :project="{{ $project }}"></payment-form>
            {{-- <form action="{{ route('project.economic-progress.store', $project) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Amount</label>
                        <input type="number" name="amount" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Date</label>
                        <input type="text" name="date" class="form-control nepali-date-picker">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Remarks</label>
                    <textarea name="remarks" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="is_last_payment" value="1"> Is last payment?
                    </label>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary z-depth-0">Save</button>
                </div>
            </form> --}}
        </div>
    </div>
    </div>
</div>
@endsection
