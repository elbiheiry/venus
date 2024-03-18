<!-- Side Menu
        ==========================================-->
<aside class="side-menu">
    <button class="toggle-btn">
        <i class="fa fa-times"></i>
    </button>
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <img src="{{ asset('public/admin/images/logo.png') }}" />
    </a>
    <ul>
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
            <a href="{{ route('admin.settings.index') }}">
                <i class="fas fa-cogs"></i>
                Site settings
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.about.index') ? 'active' : '' }}">
            <a href="{{ route('admin.about.index') }}">
                <i class="fas fa-info"></i>
                Our story
            </a>
        </li>
        <li
            class="{{ request()->routeIs('admin.brands.social.index') ||request()->routeIs('admin.brands.messages.index') ||request()->routeIs('admin.brands.story.index') ||request()->routeIs('admin.brands.media.index') ||request()->routeIs('admin.brands.products.index') ||request()->routeIs('admin.brands.partners.index') ||request()->routeIs('admin.brands.slider.index') ||request()->routeIs('admin.brands.index') ||request()->routeIs('admin.brands.edit')? 'active': '' }}">
            <a href="{{ route('admin.brands.index') }}">
                <i class="fa fa-copyright"></i>
                Brands
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.media.index') ? 'active' : '' }}">
            <a href="{{ route('admin.media.index') }}">
                <i class="fa fa-image"></i>
                Media
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.partners.index') ? 'active' : '' }}">
            <a href="{{ route('admin.partners.index') }}">
                <i class="fa fa-users"></i>
                Partners
            </a>
        </li>
        <li
            class="sub-menu {{ request()->routeIs('admin.careers.content.index') || request()->routeIs('admin.careers.index')? 'active': '' }}">
            <a rel="noreferrer" href="javascript:void(0);">
                <i class="fa fa-list"></i>
                Careers
                <i class="fa fa-angle-down"></i>
            </a>
            <ul>
                <li class="{{ request()->routeIs('admin.careers.content.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.careers.content.index') }}">
                        Content
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.careers.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.careers.index') }}">
                        Candidates
                    </a>
                </li>
            </ul>
        </li>
        <li class="{{ request()->routeIs('admin.messages.index') ? 'active' : '' }}">
            <a href="{{ route('admin.messages.index') }}">
                <i class="fa fa-envelope"></i>
                Messages
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.links.index') ? 'active' : '' }}">
            <a href="{{ route('admin.links.index') }}">
                <i class="fa fa-link"></i>
                Social links
            </a>
        </li>
    </ul>
    <!--End Ul-->
</aside>
<!--End Aside-->
