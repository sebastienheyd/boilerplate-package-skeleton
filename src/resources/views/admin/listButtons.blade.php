<a href="{{ route('~package.~resource.edit', $~resource) }}" class="btn btn-sm btn-primary mr-1">
    <span class="fa fa-pencil-alt"></span>
</a>
<button data-action="delete" data-href="{{ route('~package.~resource.destroy', $~resource) }}" class="btn btn-sm btn-danger">
    <span class="fa fa-trash"></span>
</button>
