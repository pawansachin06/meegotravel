function getAxiosError(err) {
    let msg = 'An error occurred, try again.';
    if (err?.response?.data?.message) {
        msg = err.response.data.message;
    } else if (err?.message) {
        msg = err.message;
    }
    return msg;
}