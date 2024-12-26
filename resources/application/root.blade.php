<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
	<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">

			<title>Doctor Web</title>
            <meta name="title" content="Doctor Web - Futuristic Medical appointments">
            <meta name="description" content="Book, anytime, with any doctor, with elegant ways.">

			<link rel="icon" type="image/x-icon" href="/favicon/favicon.ico">
			<link rel="shortcut icon" href="/favicon/favicon.ico">
			<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
			<link rel="android-chrome-256x256" sizes="256x256" href="/favicon/android-chrome-256x256.png">
			<link rel="android-chrome-192x192" sizes="192x192" href="/favicon/android-chrome-192x192.png">
			<link rel="icon" sizes="16x16" href="/favicon/favicon-16x16.png">
			<link rel="icon" sizes="32x32" href="/favicon/favicon-32x32.png">
			<link rel="manifest" href="/favicon/site.webmanifest">

			@vite('resources/application/main.ts')
	</head>
	<body class="antialiased font-sans">
			@hybridly
	</body>
</html>
