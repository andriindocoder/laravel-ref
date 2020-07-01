<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AlpineJS</title>
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v1.9.8/dist/alpine.js" defer></script>
</head>
<body>
	<div x-data="{ isOpen:true }">
		<button x-on:click="isOpen = !isOpen">Toggle</button>
		<h1 x-show="isOpen">Index</h1>
	</div>
</body>
</html>