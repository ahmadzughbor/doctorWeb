<script setup lang="ts">
const { circle, city, title } = useHero()
</script>

<template>
	<base-container id="hero" :fluid="true" as="div" class="h-[368px] overflow-hidden bg-gray-lightest/10 lg:h-[560px]">
		<div class="flex h-full flex-col items-center justify-end [&_*]:transition [&_*]:duration-1000 [&_*]:ease-linear">
			<div class="relative flex h-[270px] shrink-0 justify-center lg:hidden">
				<div class="absolute inset-x-0 bottom-10 z-20 flex w-full items-center justify-center">
					<h1 class="text-center text-[30px] font-bold uppercase leading-[40px] tracking-widest text-gray">
						Reach <br />
						Your Favorite <br />
						Doctors
					</h1>
				</div>

				<div class="relative z-10 h-[540px] w-[540px] rounded-full">
					<!-- Circle -->
					<div class="absolute z-[10] h-full w-full rotate-[-30deg] rounded-full bg-transparent">
						<div class="absolute left-1/2 h-12 w-12 shrink-0 -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-gray bg-orange" />
					</div>

					<!-- City -->
					<div class="absolute z-[9] h-full w-full rotate-[17deg] rounded-full bg-transparent">
						<i-custom-hero-city class="absolute left-1/2 h-[90px] -translate-x-1/2 translate-y-[-40px] text-ocre/20" :width="undefined" />
					</div>

					<!-- Blue circle -->
					<div class="absolute inset-0 z-[11] h-full w-full rounded-full bg-blue-light" />
				</div>
			</div>

			<!-- Desktop hero -->
			<div class="relative hidden h-[340px] shrink-0 justify-center lg:flex">
				<div class="absolute inset-x-0 bottom-10 z-20 flex w-full items-center justify-center">
					<h1
						class="hidden origin-bottom text-center text-[40px] font-bold uppercase leading-[55px] tracking-widest text-gray lg:block"
						:style="{ transform: `scale(${title.scale})` }"
					>
						Reach <br />
						Your Favorite <br />
						Doctors
					</h1>
				</div>

				<div class="relative z-10 h-[1154px] w-[1154px] rounded-full">
					<!-- Circle -->
					<div
						class="absolute z-[10] h-full w-full rounded-full bg-transparent"
						:style="{ transform: `rotate(${circle.rotate}deg)` }"
					>
						<div
							class="absolute left-1/2 h-[130px] w-[130px] shrink-0 rounded-full border-2 border-gray bg-orange"
							:style="{ transform: `scale(${circle.scale}) translateX(${circle.translate.x}px) translateY(${circle.translate.y}px)` }"
						/>
					</div>

					<!-- City -->
					<div
						class="absolute z-[9] h-full w-full rounded-full bg-transparent"
						:style="{ transform: `rotate(${city.rotate}deg)` }"
					>
						<i-custom-hero-city class="absolute left-1/2 h-[240px] -translate-x-1/2 translate-y-[-100px] text-ocre/20" :width="undefined" />
					</div>

					<!-- Blue circle -->
					<div class="absolute inset-0 z-[11] h-full w-full rounded-full bg-blue-light" />
				</div>
			</div>
		</div>
	</base-container>
</template>
