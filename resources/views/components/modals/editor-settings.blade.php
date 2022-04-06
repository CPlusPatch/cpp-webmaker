
<div id="editor-settings-modal" class="h-screen w-full inset-0 overflow-y-auto fixed z-50 bg-black/80 flex items-center justify-center" style="display: none;" data-toggled="false">
	<div class="flex items-end justify-center pt-4 px-4 pb-20 sm:block sm:p-0">
		<div class="inline-block relative overflow-hidden transform transition-all sm:align-middle sm:max-w-lg" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
			<div>
				<div class="rounded-lg p-2 bg-white shadow">
					<div class="bg-white dark:bg-gray-800 ">
						<div class="w-full py-2 px-4 sm:px-6 lg:py-4 lg:px-8">
							<h1 class="text-2xl mb-2">
								Settings
								<span class="px-2 py-1 text-base rounded text-white bg-yellow-300 font-medium shadow hover:shadow-lg">
									ALPHA
								</span>
							</h1>
							Visibility
							
							<select class="visibility-selection block w-52 text-gray-700 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="animals">
								<option value="private">Private</option>
								<option value="restricted">Restricted</option>
								<option value="public">Public</option>
							</select>
							
							Banner URL
							
							<input type="text" class="banner-selection rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base" placeholder="Banner URL"/>
							
							<button data-modal-confirm="#editor-settings-modal" type="button" class="mt-6 py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
								Save and close
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(() => {
		$("#editor-settings-modal").on("modal:toggle", function() {
			if (this.dataset.toggled == "false") {
				$("body").addClass("overflow-hidden");
				$(this).fadeIn("fast");
				this.dataset.toggled = "true";
			}
			else {
				$("body").removeClass("overflow-hidden");
				$(this).fadeOut("fast");
				this.dataset.toggled = "false";
			}
		});
		$("[data-modal-toggle]").on("click", function() {
			$(this.dataset.modalToggle).trigger("modal:toggle");
		});
		$("[data-modal-confirm]").on("click", function() {
			$(this.dataset.modalConfirm).trigger("modal:confirm");
		});
	});
</script>