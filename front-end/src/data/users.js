import Format from "../shared/utils/Format";

class UserService {
  async getUsers() {
    const response = await fetch(
      "https://jsonplaceholder.typicode.com/users"
    ).then((response) => response.json());

    return Format.ProxyToRaw(response);
  }
}

export default new UserService();
