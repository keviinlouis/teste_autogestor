Number.prototype.formatMoney = function (c, d, t) {
  var n = this,
    c = isNaN(c = Math.abs(c)) ? 2 : c,
    d = d == undefined ? '.' : d,
    t = t == undefined ? ',' : t,
    s = n < 0 ? '-' : '',
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
    j = (j = i.length) > 3 ? j % 3 : 0
  return s + (j ? i.substr(0, j) + t : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, '$1' + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : '')
}

String.prototype.upperFirst = function () {
  let n = this
  return n.charAt(0).toUpperCase() + n.slice(1)
}

String.prototype.toFloatNumber = function () {
  let n = this
  return n.replaceAll('.', '').replaceAll(',', '.')
}

String.prototype.replaceAll = function(search, replacement) {
  let target = this;
  return target.split(search).join(replacement);
};

Array.prototype.first = function () {
  return this[0]
}

Array.prototype.last = function () {
  return this[this.length - 1]
}


Array.prototype.findBy = function (field, value) {
  let index = this.findIndex(x => x[field] === value)
  return this[index]
}

Array.prototype.findIndexBy = function (field, value) {
  return this.findIndex(x => x[field] === value)
}
