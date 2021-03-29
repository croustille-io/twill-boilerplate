export const camelToSnake = (str) =>
  str
    .replace(/[A-Z]/g, (letter) => `-${letter.toLowerCase()}`)
    .replace(/^-+|-+$/g, '')
