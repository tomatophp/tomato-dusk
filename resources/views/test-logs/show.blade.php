<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">{{trans('tomato-admin::global.crud.view')}} TestLog #{{$model->id}}</h1>

    <div class="flex flex-col space-y-4">

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      Model
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->model?->name}}
                  </h3>
              </div>
          </div>

          <div class="flex justify-between">
              <div>
                  <h3 class="text-lg font-bold">
                      Type
                  </h3>
              </div>
              <div>
                  <h3 class="text-lg">
                      {{ $model->type}}
                  </h3>
              </div>
          </div>

        <div class="flex justify-between">
            <div>
                <h3 class="text-lg font-bold">
                    Log
                </h3>
            </div>
            <div>
                <h3 class="text-lg">
                    {{ $model->log}}
                </h3>
            </div>
        </div>

    </div>
</x-splade-modal>
