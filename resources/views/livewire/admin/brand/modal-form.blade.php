<!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Brands</h5>
                    </div>
                    <form wire:submit.prevent="storeBrand">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Brand Name</label>
                                <input type="text" wire:model.defer="name" class="form-control">
                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Brand Slug</label>
                                <input type="text" wire:model.defer="slug" class="form-control">
                                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Status</label></br>
                                <input type="checkbox" wire:model.defer="status"/> Checked=Hidden
                                @error('status') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary text-white">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
