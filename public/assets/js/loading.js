let loadingCount = 0;
function showLoading() {
  loadingCount++;
  document.getElementById("loadingIndicator").classList.remove("hidden");
}

function hideLoading() {
  loadingCount--;
  if (loadingCount <= 0) {
    loadingCount = 0;
    document.getElementById("loadingIndicator").classList.add("hidden");
  }
}
