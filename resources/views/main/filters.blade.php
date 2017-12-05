<nav class="px-nav px-nav-right bg-weddingjo" id="px-demo-nav">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
        <span class="px-nav-toggle-arrow"></span>
        <span class="navbar-toggle-icon"></span>
        <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>
    <ul class="px-nav-content">
        <form id="filter" method="POST" action="/items">

        <li class="px-nav-item">
            <div id="px-demo-togglers">
                <h3 class="px-demo-sidebar-header b-y-1 darker">{{ __('common.categories') }}</h3>
                <div>
                    <div class="box m-a-0 border-radius-0 bg-transparent" id="categories">
                    </div>
                </div>
            </div>
        </li>
        <li class="px-nav-item">
            <div id="px-demo-togglers">
                <h3 class="px-demo-sidebar-header b-y-1 darker">{{ __('common.attributes') }}</h3>
                <div>
                    <div class="box m-a-0 border-radius-0 bg-transparent" id="attributes" >
                    </div>
                </div>
            </div>
        </li>
        </form>
    </ul>
</nav>
