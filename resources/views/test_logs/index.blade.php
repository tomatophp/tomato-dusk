<x-tomato-admin-layout>
    <x-slot name="header">
        {{ __('TestLog') }}
    </x-slot>
    <x-slot:buttons>
        <div class="flex justifiy-start gap-4">
            <x-tomato-admin-button confirm method="POST" href="/admin/dusk/start">
                {{__('Start Testing')}}
            </x-tomato-admin-button>
            <x-tomato-admin-button danger confirm method="POST" href="/admin/dusk/clear">
                {{__('Clear Log')}}
            </x-tomato-admin-button>
            <x-tomato-logout />
        </div>
    </x-slot:buttons>


    <div class="pb-12" v-cloak>
        <div class="mx-auto">
            <x-splade-rehydrate poll="5000">
                <x-splade-table :for="$table" striped>
                    <x-splade-cell actions>
                        <div class="flex justify-start">
                            <x-tomato-admin-button modal :href="route('admin.test-logs.show', $item->id)" title="{{trans('tomato-admin::global.crud.view')}}" type="icon">
                                <x-heroicon-s-eye class="h-6 w-6"/>
                            </x-tomato-admin-button>
                            <x-tomato-admin-button href="/admin/dusk/{{ $item->id }}"
                                  type="icon"
                                  confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                  confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                  confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                  cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                  class="px-2 text-red-500"
                                  method="delete"
                                  title="{{trans('tomato-admin::global.crud.delete')}}"

                            >
                                <x-heroicon-s-trash class="h-6 w-6"/>
                            </x-tomato-admin-button>
                        </div>
                    </x-splade-cell>
                </x-splade-table>
            </x-splade-rehydrate>
        </div>
    </div>
</x-tomato-admin-layout>
