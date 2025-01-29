<div class="row">
    <div x-data="{
            keyword:'',
        }"
        class="col-lg-6 col-md-12">
        <div class="search-box">
            <input type="text"
                x-model="keyword"
                class="form-control form-control"
                placeholder="Rechercher"/>
            <button x-on:click="if(!keyword==''){$dispatch('searchEvent',{
                            search: keyword
                        })}"
                    class="btn btn-sm btn-primary">
                Rechercher
            </button>
        </div>
    </div>
</div>
