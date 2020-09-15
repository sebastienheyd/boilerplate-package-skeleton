<table class="table table-striped table-sm">
    <tbody>
    @foreach(array_keys($~resource->getAttributes()) as $attribute)
        <tr>
            <td scope="row"><strong>{{ $attribute }}</strong></td>
            <td>{!! nl2br(e($~resource->$attribute)) !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
