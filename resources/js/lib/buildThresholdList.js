const buildThresholdList = (numSteps = 10) => {
  let thresholds = []

  for (let i = 1.0; i <= numSteps; i++) {
    let ratio = i / numSteps
    thresholds.push(ratio)
  }

  thresholds.push(0)
  return thresholds
}

export default buildThresholdList
