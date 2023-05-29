import { isProxy, toRaw } from "vue";

class Format {
  ProxyToRaw(data) {
    if (isProxy(data)) return toRaw(data);

    return data;
  }
}

export default new Format();
