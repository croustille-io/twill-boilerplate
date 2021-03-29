// https://stackoverflow.com/a/7557433

export const isElementInViewport = (
  el,
  win = window,
  docEl = document.documentElement
) => {
  const rect = el.getBoundingClientRect()

  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (win.innerHeight || docEl.clientHeight) &&
    rect.right <= (win.innerWidth || docEl.clientWidth)
  )
}
