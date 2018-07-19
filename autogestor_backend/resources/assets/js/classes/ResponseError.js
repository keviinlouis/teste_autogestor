export default class ResponseError {
  constructor (messages, code) {
    this.messages = messages
    this.code = code
  }

  hasInput (input) {
    return !(typeof this.messages[input] === 'undefined')
  }

  getMessageFromInput (input) {
    if (!this.hasInput(input)) {
      return ''
    }
    if (Array.isArray(this.messages[input])) {
      return this.messages[input].first().upperFirst()
    }
    return this.messages[input].upperFirst()
  }
  getMessage () {
    return this.messages
  }

  getCode () {
    return this.code
  }
}
