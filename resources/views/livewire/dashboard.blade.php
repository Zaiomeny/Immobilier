<fragment class="row">
<div class="col-md-6 col-xl-4">
    <div class="card widget-card-1">
        <div class="card-block-small">
            <i class="icofont icofont-building-alt bg-c-blue card1-icon"></i>
            <span class="text-c-blue f-w-600">{{__('Vos immobiliers')}}</span>
            <h5 class="mt-3">{{$this->soldedPosts}}/{{$this->posts->count()}}</h5>
            <div>
                <span class="f-left m-t-10 text-muted">
                    <i
                        class="text-c-blue f-16 icofont icofont-info-square"></i> {{__('En solde / Tout')}} 
                </span>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-4">
    <div class="card widget-card-1">
        <div class="card-block-small">
            <i class="icofont icofont-money bg-c-pink card1-icon"></i>
            <span class="text-c-pink f-w-600"> {{__('Moyenne de prix')}}</span>
            <h5 class="mt-3">{{$this->priceAverage}}</h5>
            <div>
                <span class="f-left m-t-10 text-muted">
                    <i
                        class="text-c-pink f-16 icofont icofont-list"></i> Sur les {{$this->posts->count()}} immobiliers
                </span>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 col-xl-4">
    <div class="card widget-card-1">
        <div class="card-block-small">
            <i
                class="icofont icofont-users-social bg-c-green card1-icon"></i>
            <span class="text-c-green f-w-600"> {{__('Suivi(e)s / Followers')}}</span>
            <h5 class="mt-3">{{$this->subscribeTo}} / {{$this->followers}}</h5>
            <div>
                <span class="f-left m-t-10 text-muted">
                    <i class="text-c-green f-16 icofont icofont-users-alt-1"></i> {{__('Interaction entre utilisateurs')}}
                </span>
            </div>
        </div>
    </div>
</div>
<!-- card1 end -->
    <!-- Statestics Start -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Statestics</h5>
                <div class="card-header-left ">
                </div>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="icofont icofont-simple-left "></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i>
                        </li>
                        <li><i class="icofont icofont-minus minimize-card"></i>
                        </li>
                        <li><i class="icofont icofont-refresh reload-card"></i>
                        </li>
                        <li><i class="icofont icofont-error close-card"></i>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div id="statestics-chart" style="height:207px;"></div>
            </div>
        </div>
    </div>
</fragment>
