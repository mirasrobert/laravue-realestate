// Add Review
export const addReview = (formData) => {
    const { data } = axios.post(`/api/reviews`, formData);
    return data;
};
