<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <br>
            @if($this->totalProductAmount != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="bg-white p-3">
                        <h4 class="text-primary">
                            Item Total Amount :
                            <span class="float-end">${{$this->totalProductAmount}}</span>
                        </h4>
                        <br>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br/>
                        <small>* Tax and all other charges are included.</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="bg-white p-3">
                        <h4 class="text-primary">
                            Basic Information
                        </h4>
                        <br>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" wire:model.defer="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" />
                                @error('fullname')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="number" wire:model.defer="phone" id="phone" class="form-control" placeholder="Enter Phone Number" />
                                @error('phone')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email Address</label>
                                <input type="email" wire:model.defer="email" id="email" class="form-control" placeholder="Enter Email Address" />
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Pin-code (Zip-code)</label>
                                <input type="number" wire:model.defer="pincode" id="pincode" class="form-control" placeholder="Enter Zip-code" />
                                @error('pincode')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Full Address</label>
                                <textarea wire:model.defer="address" id="address" class="form-control" rows="2"></textarea>
                                @error('address')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3" wire:ignore>
                                <label>Select Payment Method: </label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button wire:loading.attr="disabled" class="nav-link active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
                                        <button wire:loading.attr="disabled" class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">

                                            <button type="button" wire:loading.attr="disabled" wire:click="codOrder" class="btn btn-primary float-end">
                                                <span wire:loading.remove wire:target="codOrder">
                                                    Place Order
                                                </span>
                                                <span wire:loading wire:target="codOrder">
                                                    Placing Order
                                                </span>
                                            </button>
                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">

                                            {{--<button type="button" wire:loading.attr="disabled" class="btn btn-warning">Pay Now (Online Payment)</button>--}}
                                            <div>
                                                <div id="paypal-button-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="card card-body text-center p-md-5">
                    <h4>No items in your Cart</h4>
                    </br>
                    <a href="{{url('collections')}}" class="btn btn-warning">Add Items now</a>
                </div>
            @endif
        </div>
    </div>
</div>


@push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AdQxuM1uc2eemb_Vit0sgcVUaPGKF_mDLokAnaZ6GOtdPR0h6vAwNCiKUqDE5wAw7qMHPWCJgYExCvsG&currency=USD"></script>
    <script>
      paypal.Buttons({
        onClick: function()  {
            // Show a validation error if the checkbox is not checked
            if (!document.getElementById('fullname').value
                || !document.getElementById('phone').value
                || !document.getElementById('email').value
                || !document.getElementById('pincode').value
                || !document.getElementById('address').value
            )
            {
                Livewire.emit('validationForAll');
                return false;
            } else {
                @this.set('fullname', document.getElementById('fullname').value);
                @this.set('email', document.getElementById('email').value);
                @this.set('phone', document.getElementById('phone').value);
                @this.set('pincode', document.getElementById('pincode').value);
                @this.set('address', document.getElementById('address').value);
            }
        },
        // Order is created on the server and the order id is returned
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                    value: '0.1'//'{{$this->totalProductAmount}}'
                    }
                }]
            });
            /*
            DEFAULT STANDARD
            return fetch("/api/orders", {
                method: "post",
                // use the "body" param to optionally pass additional order information
                // like product ids or amount
            })
            .then((response) => response.json())
            .then((order) => order.id);
          */
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(orderData) {
                // This function shows a transaction success message to your buyer.
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                if(transaction.status == 'COMPLETED'){
                    Livewire.emit('transactionEmit', transaction.id);
                    //return false;
                }
            });
        }
        /*
        DEFAULT ON APPROVE
        // Finalize the transaction on the server after payer approval
        onApprove: (data, actions) => {
          return fetch(`/api/orders/${data.orderID}/capture`, {
            method: "post",
          })
          .then((response) => response.json())
          .then((orderData) => {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
        */
      }).render('#paypal-button-container');
    </script>
@endpush
