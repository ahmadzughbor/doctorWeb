function getEquationValue({ y2, y1, x2, x1, input }: { y2: number; y1: number; x1: number; x2: number; input: number }) {
	const slope = (y2 - y1) / (x2 - x1)
	const value = slope * input + y1
	return value
}

export function useHero() {
	const ANIMATE_ON_SCROLL_FROM = 0
	const ANIMATE_ON_SCROLL_TO = 80

	const variants = {
		circle: {
			scaleTo: 0.78,
			rotate: {
				from: -40,
				to: 40,
			},
			translate: {
				y: {
					from: -80,
					to: -92,
				},
				x: {
					from: 25,
					to: -92,
				},
			},
		},
		city: {
			rotate: {
				from: 21,
				to: -25,
			},
		},
		title: {
			scaleTo: 1.3,
		},
	}

	const circle = reactive({
		scale: 1,
		rotate: variants.circle.rotate.from,
		translate: {
			y: variants.circle.translate.y.from,
			x: variants.circle.translate.x.from,
		},
	})

	const city = reactive({
		rotate: variants.city.rotate.from,
	})

	const title = reactive({
		scale: 1,
	})

	const { y } = useScroll(document)

	watch(y, (equationInput) => {
		// Update to destination when page doesn't load on top
		if (equationInput > ANIMATE_ON_SCROLL_TO) {
			city.rotate = variants.city.rotate.to

			circle.rotate = variants.circle.rotate.to
			circle.translate.x = variants.circle.translate.x.to
			circle.translate.y = variants.circle.translate.y.to
			circle.scale = variants.circle.scaleTo

			title.scale = variants.title.scaleTo
		} else {
			// City
			city.rotate = getEquationValue({
				y2: variants.city.rotate.to,
				y1: variants.city.rotate.from,
				x1: ANIMATE_ON_SCROLL_FROM,
				x2: ANIMATE_ON_SCROLL_TO,
				input: equationInput,
			})

			// Circle
			circle.rotate = getEquationValue({
				y2: variants.circle.rotate.to,
				y1: variants.circle.rotate.from,
				x1: ANIMATE_ON_SCROLL_FROM,
				x2: ANIMATE_ON_SCROLL_TO,
				input: equationInput,
			})
			circle.translate.x = getEquationValue({
				y2: variants.circle.translate.x.to,
				y1: variants.circle.translate.x.from,
				x1: ANIMATE_ON_SCROLL_FROM,
				x2: ANIMATE_ON_SCROLL_TO,
				input: equationInput,
			})
			circle.translate.y = getEquationValue({
				y2: variants.circle.translate.y.to,
				y1: variants.circle.translate.y.from,
				x1: ANIMATE_ON_SCROLL_FROM,
				x2: ANIMATE_ON_SCROLL_TO,
				input: equationInput,
			})
			circle.scale = getEquationValue({
				y2: variants.circle.scaleTo,
				y1: 1,
				x1: ANIMATE_ON_SCROLL_FROM,
				x2: ANIMATE_ON_SCROLL_TO,
				input: equationInput,
			})

			// Title
			title.scale = getEquationValue({
				y2: variants.title.scaleTo,
				y1: 1,
				x1: ANIMATE_ON_SCROLL_FROM,
				x2: ANIMATE_ON_SCROLL_TO,
				input: equationInput,
			})
		}
	})

	return {
		city,
		circle,
		title,
	}
}
