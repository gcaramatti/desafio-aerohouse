class Mask {
  apply(mask, value) {
    if (!value || value === null) {
      return "";
    }

    switch (mask) {
      case "phone":
        const retorno = value
          .toString()
          .replace(/\D/g, "")
          .replace(/^(\d{2})\B/, "($1) ")
          .replace(/(\d{1})?(\d{4})(\d{4})/, "$1 $2-$3");
        console.log(retorno);

        return value
          .toString()
          .replace(/\D/g, "")
          .replace(/^(\d{2})\B/, "($1) ")
          .replace(/(\d{1})?(\d{4})(\d{4})/, "$1 $2-$3");

      default:
        return value;
    }
  }

  remove(value) {
    if (!value) return "";

    return value.toString().replace(/\D/g, "");
  }
}

export default new Mask();
