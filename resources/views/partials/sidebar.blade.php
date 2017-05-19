@inject('request', 'Illuminate\Http\Request')
<ul class="nav" id="side-menu">

    <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
        <a href="{{ url('/') }}">
            <i class="fa fa-wrench"></i>
            <span class="title">@lang('quickadmin.qa_dashboard')</span>
        </a>
    </li>

    
            @can('user_management_access')
            <li class="">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('book_access')
            <li class="{{ $request->segment(2) == 'books' ? 'active' : '' }}">
                <a href="{{ route('admin.books.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.books.title')</span>
                </a>
            </li>
            @endcan
            
            @can('quiz_access')
            <li class="{{ $request->segment(2) == 'quizzes' ? 'active' : '' }}">
                <a href="{{ route('admin.quizzes.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.quizzes.title')</span>
                </a>
            </li>
            @endcan
            
{{--            @can('possible_answer_access')
            <li class="{{ $request->segment(2) == 'possible_answers' ? 'active' : '' }}">
                <a href="{{ route('admin.possible_answers.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.possible-answers.title')</span>
                </a>
            </li>
            @endcan--}}
            
            @can('user_answer_access')
            <li class="{{ $request->segment(2) == 'user_answers' ? 'active' : '' }}">
                <a href="{{ route('admin.user_answers.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.user-answers.title')</span>
                </a>
            </li>
            @endcan

    

    <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
        <a href="{{ route('auth.change_password') }}">
            <i class="fa fa-key"></i>
            <span class="title">Change password</span>
        </a>
    </li>

    <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
</ul>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}
