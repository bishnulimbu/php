@props(['name'])
@error($name)
<!-- $name is a variable from props -->
<p {{$attributes->merge([ 'class'=>'text-xs font-semibold text-red-400'])}}>{{$message}}</p>
@enderror
