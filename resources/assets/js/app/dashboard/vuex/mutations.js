
export const removeWidget = (state, { rowIndex, columnIndex }) => {
    const page = 0;
    console.log(`remove row ${rowIndex}, column ${columnIndex}`);
    state.pages[page].widgets[rowIndex] = state.pages[page].widgets[rowIndex].splice(columnIndex, 1)
};