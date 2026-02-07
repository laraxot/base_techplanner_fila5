@props([
    'class' => 'h-8 w-auto',
    'color' => 'currentColor',
])

<svg 
    class="{{ $class }}" 
    fill="{{ $color }}" 
    viewBox="0 0 200 60" 
    xmlns="http://www.w3.org/2000/svg"
>
    <text x="10" y="40" font-family="Arial, sans-serif" font-weight="bold" font-size="32">
        TechPlanner
    </text>
    <circle cx="170" cy="30" r="20" fill="currentColor" opacity="0.2"/>
    <circle cx="170" cy="30" r="12" fill="currentColor" opacity="0.4"/>
</svg>