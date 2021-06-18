@for ($i = 0; $i < 2; $i++)
    <div class="shadow card border-primary mb-3">
        <div class="card-header">Header {{ $i }}</div>
        <div class="card-body">
            <h5 class="card-title">Info card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
        </div>
    </div>
@endfor
