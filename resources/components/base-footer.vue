<template>
	<footer>
		<div class="border-t border-ocre-lightest bg-white py-6">
			<base-container as="div">
				<div class="flex items-center justify-center lg:justify-between">
					<div class="flex items-center gap-x-8 text-gray">
						<router-link href="/#services" class="hover:text-gray-light focus:outline-none focus-visible:ring-2 focus-visible:ring-gray">
							Services
						</router-link>
					</div>
					<div class="hidden lg:block">
						<router-link href="/" class="flex items-center gap-x-2 text-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-dark">
							<svg class="h-12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20 6H16V4C16 2.9 15.1 2 14 2H10C8.9 2 8 2.9 8 4V6H4C2.9 6 2 6.9 2 8V20C2 21.1 2.9 22 4 22H20C21.1 22 22 21.1 22 20V8C22 6.9 21.1 6 20 6ZM10 4H14V6H10V4ZM16 15H13V18H11V15H8V13H11V10H13V13H16V15Z" fill="#2DD4BF" />
							</svg>
							<p>Doctor<span class="text-teal-500">Web</span></p>
						</router-link>
					</div>
				</div>
			</base-container>
		</div>
		<div class="bg-gray py-4">
			<base-container as="div">
				<div class="flex justify-center lg:block">
					<span class="text-sm text-white">
						© Doctor Web {{ new Date().getFullYear() }}
					</span>
				</div>
			</base-container>
		</div>
	</footer>
</template>
