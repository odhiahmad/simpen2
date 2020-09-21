<div class="row">
    @foreach($databaseHarga as $data)
        <div class="col-xl-3">
            <!--begin:: Widgets/Blog-->
            <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
                <div class="m-portlet__head m-portlet__head--fit">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-action">
                            <button type="button" class="btn btn-sm m-btn--pill  btn-brand">
                                Barang
                            </button>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-widget19">
                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height-: 286px">
                            <img src="{{asset('images/data-barang/'.$data->foto)}}" alt="">
                            <div class="m-widget19__shadow"></div>
                        </div>
                        <div class="m-widget19__content">
                            <div class="m-widget19__header">
                                <div class="m-widget19__info">
                                    <span class="m-widget19__username">
                                       {{$data->nama_barang }}
                                    </span>
                                    <br>
                                    <span class="m-widget19__time">
                                        	Rp.{{$data->harga_satuan}}
                                    </span>
                                </div>
                                <div class="m-widget19__stats">
                                    <span class="m-widget19__number m--font-brand">
                                        {{$data->jumlah }}
                                    </span>
                                    <span class="m-widget19__comment">
                                        Stok
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget19__action">
                            <a href='{!! url('user/database-harga/detail/'.$data->id); !!}' type="button"
                               class="btn m-btn--pill btn-primary m-btn m-btn--hover-brand m-btn--custom">
                                Detail
                            </a>
                            <a href='{!! url('user/database-harga/ubah/'.$data->id); !!}' type="button"
                               class="btn m-btn--pill btn-warning m-btn m-btn--hover-brand m-btn--custom">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{!! $databaseHarga->render() !!}
