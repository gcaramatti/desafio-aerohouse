import Format from "../shared/utils/Format";

class Posts {
  async getPostsByUser(id) {
    const response = await fetch(
      `https://jsonplaceholder.typicode.com/posts/${id}/comments`
    ).then((response) => response.json());

    return Format.ProxyToRaw(response);
  }

  async newPost(payload) {
    const response = await fetch("https://jsonplaceholder.typicode.com/posts", {
      method: "POST",
      body: JSON.stringify({
        title: payload.name,
        body: payload.body,
        userId: payload.userId,
      }),
      headers: {
        "Content-type": "application/json; charset=UTF-8",
      },
    }).then((response) => response.json());

    return response;
  }

  async editPost(payload) {
    const response = fetch(
      `https://jsonplaceholder.typicode.com/posts/${payload.id}`,
      {
        method: "PUT",
        body: JSON.stringify({
          id: payload.id,
          title: payload.name,
          body: payload.body,
          userId: payload.userId,
        }),
        headers: {
          "Content-type": "application/json; charset=UTF-8",
        },
      }
    ).then((response) => response.json());

    console.log(response);

    return response;
  }
}

export default new Posts();
