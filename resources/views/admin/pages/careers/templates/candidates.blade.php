@foreach ($candidates as $candidate)
    <div class="item-list gray">
        <img src="{{ $candidate->image() }}" />
        <div class="item-content">
            {{ $candidate->name }}
            <br />
            <span> <i class="fa fa-clock"></i> {{ $candidate->created_at->diffForHumans() }} </span>
            <span> <i class="fa fa-envelope"></i> {{ $candidate->email }} </span>
            <span> <i class="fa fa-phone"></i> {{ $candidate->phone }} </span>
            <span> <i class="fa fa-info"></i> {{ $candidate->department }} </span>
        </div>
        <a class="icon-btn blue-bc" href="{{ get_image($candidate->cv, 'candidates') }}" download target="_blank"
            style="margin-right: 35px;">
            <i class="fa fa-download"></i>
        </a>
        <button class="icon-btn red-bc delete-btn"
            data-url="{{ route('admin.careers.delete', ['id' => $candidate->id]) }}">
            <i class="fa fa-trash"></i>
        </button>
    </div>
@endforeach
