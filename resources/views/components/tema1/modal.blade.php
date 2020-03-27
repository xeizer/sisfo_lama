<button type="button" {{$attributes->merge(["class", "btn waves-effect"])}} data-toggle="modal" data-target="#default-Modal">Static</button>
<div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$header}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Static Modal</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing</p>
                {{$slot}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
            </div>
        </div>
    </div>
</div>
