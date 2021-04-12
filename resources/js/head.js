import { webpIsSupported } from './lib'

const CROUSTILLE = window.CROUSTILLE || {}

const checkWebpSupport = async () => {
  if (await webpIsSupported()) {
    console.log('webp is Supported')
    CROUSTILLE.webp = true
  } else {
    console.log("webp isn't supported")
    CROUSTILLE.webp = false
  }
}
checkWebpSupport()
