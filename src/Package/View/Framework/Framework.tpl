{{$request = request()}}
Package: {{$request.package}}

Module: {{$request.module|>string.uppercase.first}}

{{if(!is.empty($request.submodule))}}
Submodule: {{$request.submodule|>string.uppercase.first}}
{{/if}}
Options:
{{binary()}} {{$request.package}} framework environment development
{{binary()}} {{$request.package}} framework environment production
{{binary()}} {{$request.package}} framework environment replica
{{binary()}} {{$request.package}} framework environment staging
{{binary()}} {{$request.package}} framework environment test
