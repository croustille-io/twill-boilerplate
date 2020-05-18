const isColliding = (a, b, log = false) => {
  const aRect = a.getBoundingClientRect()
  const aHeight = a.offsetHeight
  const aWidth = a.offsetWidth
  const aFromTop = aRect.top + aHeight
  const aFromLeft = aRect.left + aWidth

  const bRect = b.getBoundingClientRect()
  const bHeight = b.offsetHeight
  const bWidth = b.offsetWidth
  const bFromTop = bRect.top + bHeight
  const bFromLeft = bRect.left + bWidth

  log && console.log(a, aRect)
  log && console.log(b, bRect)

  const notColliding =
    aFromTop < bRect.top ||
    aRect.top > bFromTop ||
    aFromLeft < bRect.left ||
    aRect.left > bFromLeft

  return !notColliding
}

export default isColliding
