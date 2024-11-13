<iframe allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe"
    src="https://heyzine.com/api1?pdf={{ route('products.get-book', ['code' => $code, 'v' => '100']) }}&k={{ config('heyzine.client_key') }}&d=0&pn=1&fs=1&prev_next=1"
    style="border: 1px solid lightgray; width: 388px; height: 600px;"></iframe>
