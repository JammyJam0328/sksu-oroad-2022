 @props(['active' => false])
 <div {{ $attributes }}
     @class([
         'cursor-pointer block px-4 py-2 text-sm',
         'hover:bg-gray-100  text-gray-700' => !$active,
         'bg-green-600 text-white' => $active,
     ])>
     {{ $slot }}
 </div>
