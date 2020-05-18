// https://ourcodeworld.com/articles/read/630/how-to-detect-if-the-webp-image-format-is-supported-in-the-browser-with-javascript

export default async function webpIsSupported() {
  // If the browser doesn't has the method createImageBitmap, you can't display webp format
  if (!self.createImageBitmap) return false;

  // Base64 representation of a white point image
  const webpData =
    "data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoCAAEAAQAcJaQAA3AA/v3AgAA=";

  // Retrieve the Image in Blob Format
  const blob = await fetch(webpData).then((r) => r.blob());

  // If the createImageBitmap method succeeds, return true, otherwise false
  return createImageBitmap(blob).then(
    () => true,
    () => false
  );
}

// You can run your code like
// (async () => {
//   if(await WebpIsSupported()) {
//       console.log('Is Supported');
//   } else {
//       console.log("Isn't supported");
//   }
// })();
