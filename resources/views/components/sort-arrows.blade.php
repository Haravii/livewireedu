<div>
    {{ $fieldName }}
    @if($orderByFieldList[(string)$orderByField] != $fieldName)
    ⇵
    @elseif($orderByDirection == 'asc')
    🠗
    @else
    🠕
    @endif
</div>