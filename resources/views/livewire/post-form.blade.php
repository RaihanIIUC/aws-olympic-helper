  <div>
      <form method="POST" wire:submit.prevent="storePost" class="row">
          @csrf

          <div class="col-md-6">
              <div class="form-group">
                  <label for="input_from">From</label>
                  <input type="date" wire:model.lazy="start" class="form-control">
              </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                  <label for="input_to">To</label>
                  <input type="date" wire:model.lazy="end" class="form-control">
              </div>
          </div>

          <div class="col-md-12  d-flex justify-content-center">
              <button type="submit" class="btn btn-info">
                  <svg wire:loading wire:target="storePost" class="
                                    w-5
                                    h-5
                                    mr-3
                                    -ml-1
                                    text-white
                                    animate-spin
                                " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                      </path>
                  </svg>
                  Download</button>
          </div>
      </form>
  </div>
